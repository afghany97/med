<template>
    <div>
        <navigation></navigation>
        <slider></slider>
        <HorizontalList endpoint="http://localhost:8888/api/products?tag=best-selling"></HorizontalList>
<!--        <HorizontalList endpoint="http://localhost:8888/api/brands?limit=10"></HorizontalList>-->
<!--        <HorizontalList endpoint="http://localhost:8888/api/products?sorts[0][name]=views"></HorizontalList>-->
<!--        <HorizontalList endpoint="http://localhost:8888/api/products?sorts[0][name]=creation"></HorizontalList>  <HorizontalList endpoint="http://localhost:8888/api/brands?limit=10"></HorizontalList>-->
<!--        <HorizontalList endpoint="http://localhost:8888/api/products?sorts[0][name]=views"></HorizontalList>-->
<!--       views <HorizontalList endpoint="http://localhost:8888/api/products?sorts[0][name]=creation"></HorizontalList>-->
    </div>

</template>

<script>
import axios from "axios";

export default {
    name: "app",
    data() {
        return {
            category: 'home',
            images: []
        };
    },
    methods: {
        setCategory: function (category) {
            this.category = category;
        }
    },
    mounted() {
        axios.get('http://localhost:8888/api/ads')
            .then(response => {
                this.images= response.data.data;
            })
            .catch(error => {
                console.log(error)
            })

    }
};


</script>
