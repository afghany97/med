
<template>
    <div>
        <transition-group name="fade" tag="div">
            <div v-for="i in [currentIndex]" :key="i">
                <img :src="currentImg"/>
            </div>
        </transition-group>
        <a class="prev" @click="prev" href="#">&#10094; Previous</a>
        <a class="next" @click="next" href="#">&#10095; Next</a>
    </div>
</template>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: all 0.9s ease;
    overflow: hidden;
    visibility: visible;
    position: absolute;
    width: 100%;
    opacity: 1;
}

.fade-enter,
.fade-leave-to {
    visibility: hidden;
    width: 100%;
    opacity: 0;
}

img {
    height: 600px;
    width: 100%
}

.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 40%;
    width: auto;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.7s ease;
    border-radius: 0 4px 4px 0;
    text-decoration: none;
    user-select: none;
}

.next {
    right: 0;
}

.prev {
    left: 0;
}

.prev:hover, .next:hover {
    background-color: rgba(0, 0, 0, 0.9);
}
</style>
<script>
import axios from "axios";

export default {
    name: "Slider",
    data() {
        return {
            images: [],
            timer: null,
            currentIndex: 0
        };
    },

    mounted: function () {
        this.getImages();
        this.startSlide();
    },


    methods: {
        getImages: function () {
            axios.get('http://localhost:8888/api/ads')
                .then(response => {
                    this.images = response.data.data;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        startSlide: function () {
          //  this.timer = setInterval(this.next, 3000);
          //  this.timer = setInterval(this.next, 3000);
        },

        next: function () {
            this.currentIndex += 1;
        },
        prev: function () {
            this.currentIndex -= 1;
        }


    },

    computed: {
        currentImg: function () {
            return this.images[Math.abs(this.currentIndex) % this.images.length];
        }
    }
};
</script>
