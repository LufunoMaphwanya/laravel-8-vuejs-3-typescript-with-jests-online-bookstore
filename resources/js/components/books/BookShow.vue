<template>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card" style="width: 90%;  margin: 5px">
                    <div class="card-body">
                            <h5 class="card-title">{{ book.title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ book.year}}</h6>
                    </div>
                </div>
            </div>

            <div class="col-9 border">
                <div class="card" style="width: 100%;  margin: 10px; padding: 10px;" v-for="page in book.pages" :key="page.id">
                    <div class="card-body">
                            {{ page.content}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang='ts'>
import useBooks from '../../composables/books'
import { onMounted } from 'vue';

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },

    setup(props: any) {
        const { book, getBook } = useBooks()

        onMounted(() => getBook(props.id))

        return {
            book
        }
    }
}
</script>
