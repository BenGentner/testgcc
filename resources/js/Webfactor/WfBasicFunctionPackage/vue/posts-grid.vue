<template>
    <div>
<!--        <category-dropdown class="inline-flex m-2" :category="category" @selectedCategory="updateCategory"></category-dropdown>-->
<!--        <div class="field flex p-2 inline-flex items-center w-3/4">-->
<!--            <label class="label pr-4">Search: </label>-->
<!--            <div class="control w-1/4" >-->
<!--                <input name="search"-->
<!--                       @keyup="updateSearch($event)"-->
<!--                       onclick="this.select()"-->
<!--                       class="input"-->
<!--                       type="text"-->
<!--                       placeholder="Search for tags, usernames or titles">-->
<!--            </div>-->
<!--        </div>-->
<!--        post preview-->

        <p v-if="posts.length === 0">
            Zur Zeit sind keine News vorhanden
        </p>
         <post-preview v-else
             v-for="(post, index) in posts"
             :post="post"
             v-bind:key="post.id">
             <div v-if="index !== posts.length -1" class="row">
                 <hr>
             </div>
         </post-preview>

<!--        <a class="flex justify-center items-center text-3xl" @click="morePosts">&#45;&#45;&#45;&#45;&#45;&#45; mehr Anzeigen &#45;&#45;&#45;&#45;&#45;&#45;</a>-->
        <div @click="morePosts" v-if="posts.length < posts_amount" class="relative flex py-5 items-center">
            <div class="flex-grow border-t border-gray-400"></div>
            <a  class="flex-shrink mx-4 text-gray-400">mehr News Anzeigen</a>
            <div class="flex-grow border-t border-gray-400"></div>
        </div>

    </div>
</template>

<script>

import PostPreview from "./post-preview";
import config from "./config.js"
export default {
    name: "posts-grid.vue",
    components: {PostPreview},
    data() {
        return {
            posts: [],
            posts_amount: null,
        }
    },

    created() {
        config.get("multiple_posts_path")
            .then((response) => {
                this.posts_url = response;
                this.getPosts();
            }).catch(error => console.error(error))

        axios.get("api/posts/amount")
            .then(response => this.posts_amount = response.data)
    },
    methods: {
        getPosts() {
            axios.get("/api/" +  this.posts_url)
                .then(response => this.posts = response.data)

        },
        morePosts()
        {
            axios.get("/api/" +  this.posts_url, {
                params: {skip: this.posts.length, amount: 3}})
                .then(response => this.posts = this.posts.concat(response.data))
        }
    }
}
</script>

<style scoped>

</style>
