<template>
    <div class="container">
        <!--        <div v-if="state.items.length > 0" class="grid grid-cols-5 gap-4">-->
        <div class="row">
            <div v-for="(item, index) in visibleItems" :key="index" class="col">
                <div class="item">
                    <img :src="item.image" :alt="item.title"/>
                    <h3>{{ item.title }}</h3>
                </div>
            </div>
        </div>
        <!--        </div>-->
        <div class="navigation">
            <button @click="prev" :disabled="currentPage === 0">Prev</button>
            <button @click="next" :disabled="currentPage === totalPages - 1">Next</button>
        </div>
    </div>
</template>

<script>
import {computed, onMounted, reactive} from 'vue'

export default {
    name: 'HorizontalList',
    props: {
        endpoint: {
            type: String,
            required: true,
        },
        perPage: {
            type: Number,
            default: 5,
        },
    },
    setup(props) {
        console.log('setup called')
        const state = reactive({
            items: [],
            currentPage: 0,
            totalPages: 0,
        })

        async function fetchData() {
            const response = await fetch(props.endpoint)
            const data = await response.json()
            state.items = data.data
            state.totalPages = Math.ceil(data.length / props.perPage)
        }

        function prev() {
            console.log(`in prev`)
            state.currentPage--
        }

        function next() {
            console.log(`in next`)
            state.currentPage++
        }

        console.log(`mounting`)
        onMounted(fetchData)

        console.log(`building visibleItems`)
        const visibleItems = computed(() => {

            const start = state.currentPage * props.perPage
            const end = start + props.perPage


            console.log("here")
            return state.items.slice(start, end)

        })
        console.log(`returning`)

        return {
            ...state,
            state,
            visibleItems,
            prev,
            next,
        }
    },
}
</script>

<style>
.container {
    max-width: 100%;
    overflow-x: scroll;
}

.row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -1rem;
}

.col {
    flex-basis: calc(20% - 2rem);
    margin: 1rem;
}

.item {
    text-align: center;
    height: 50px;
}

img {
    max-width: 100%;
}

.navigation {
    display: flex;
    justify-content: center;
    margin-top: 1rem;
}

.navigation button {
    margin: 0 0.5rem;
}
</style>
