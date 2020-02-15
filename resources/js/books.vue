<template>
    <div>
        <div class="input-group mb-4 float-right pull-right mt-5">
            <input type="text" class="form-control col-md-5" v-model="filters.name.value" placeholder="Search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <img src="/icons/search.svg" alt="" title="search">
                </span>
            </div>

            <a class="btn btn-warning btn-xs ml-2" :href="'/export'">Export CSV User Data</a>
            <a class="btn btn-warning btn-xs ml-2" :href="'/exportxml'">Export XML User Data</a>
        </div>
        <v-table :data="books" 
                 :filters="filters"
                 :currentPage.sync="currentPage"
                 :pageSize="12"
                 @totalPagesChanged="totalPages = $event"
                 class="table table-hover table-bordered table-xs customTableTextSize">
            <thead slot="head">
              <v-th sortKey="title" class="custom_table_label" >Title</v-th>
              <v-th sortKey="author" class="custom_table_label" >Author</v-th>
              <th class="custom_table_label text-center" >Action</th>
            </thead>
            <tbody slot="body" slot-scope="{displayData}">
                <v-tr v-for="item in displayData" :key="item.id" :row="item" v-if="books.length">
                    <td>{{ item.title }}</td>
                    <td>{{ item.author }}</td>
                    <td>
                        <center>
                            <a :href="'/books/'+item.id+'/edit'"><img src="/icons/pencil.svg" alt="" title="change"></a> | 
                            <a :href="'/books/'+item.id+'/delete'"><img src="/icons/trash.svg" alt="" title="delete"></a>
                        </center>
                    </td>
                </v-tr>
                <v-tr v-else>
                    <td colspan="4"></td>
                </v-tr>
            </tbody>
        </v-table>
        <smart-pagination :currentPage.sync="currentPage" :totalPages="totalPages"/>
    </div>
</template>

<script>
export default{
    mounted() {
        this.getBooks();
    },
    data() {
        return {
            filters: {
                name: { value: '', keys: ['title','author'] },
            },
            currentPage: 1,
            totalPages: 0,
            books: [],
        }
    },
    methods :{
        // get book all list
        getBooks: function() {
            axios.get('/api/getBooks')
                .then(response => {
                    this.books = response.data;
            })
            .catch(error => {
                console.warn(error);
            })
        },
    }
}
</script>

<style scoped>
    .custom_table_label {
        background:#7fb3da;
        color:#fff;
    }
    .custom_table_field {
        background:#fff;
    }
    textarea {
        min-height: 93px;
    }
    input, textarea {
        border-radius: 0px !important;
    }
    .td_nopadding {
        padding: 0px !important;
    }
    .customTableTextSize {
        font-size: 13px;
    }
    .customTableTextSize tbody {
        background: #fff;
    }
    .computedBackground {
        background: #eff3f7;
    }
</style>