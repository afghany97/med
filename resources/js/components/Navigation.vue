<template>
    <nav class="navbar">
        <div class="right">

            <input type="checkbox" id="check">

            <label for="check" class="checkBtn">

                <i class="fa fa-bars"></i>

            </label>

            <ul class="list">
                <li><a href="#" v-for="category in categories" v-text="category.name"
                       @click="setCategory(category.name)"></a></li>
            </ul>
        </div>
    </nav>
</template>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins&family=Ubuntu:wght@300;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color: #fff;
    font-family: 'Ubuntu', sans-serif;
}

.navbar {
    background-color: rgb(22, 7, 36);
    display: flex;
    justify-content: space-around;
    align-items: center;
    line-height: 5rem;
}

/*.left h1 {*/
/*    font-size: 2.5rem;*/
/*    cursor: pointer;*/
/*}*/

.checkBtn {
    display: none;
}

#check {
    display: none;
}

.checkBtn {
    cursor: pointer;
    font-size: 30px;
    float: right;
    color: #ed1e79;
    line-height: 80px;
}

.right ul {
    display: flex;
    list-style: none;
}

.right ul li a {
    padding: 10px 20px;
    font-size: 1.2rem;
    color: white;
    cursor: pointer;
    text-decoration: none;
    transition: all 1s;
}

.right ul li a:hover {
    background-color: #fff;
    border-radius: 7px;
    color: rgb(22, 7, 36);
}
</style>


<script>
import axios from "axios";

export default {
    name: "navigation",
    data() {
        return {
            categories: [],
            currentCategory: null,
            limit: 10
        };
    },
    methods: {
        getCategories: function () {
            axios.get(`http://localhost:8888/api/categories?limit=${this.limit}`)
                .then(response => {
                    this.categories = response.data.data;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        setCategory: function (category) {
            this.currentCategory = category
        }
    },
    mounted() {
        this.getCategories()
    }
};
</script>
