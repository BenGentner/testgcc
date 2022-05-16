<template>
<!--    <a  :href="'/' + post_url + $attrs.data.slug"-->
<!--        class="border-4 m-2 p-4 hover:border-blue-300 flex grid grid-cols-2 rounded-3xl bg-gray-100 border-gray-400">-->
<!--        <div class="col-start-1 " v-text="$attrs.data.title"></div>-->
<!--        <div class="col-start-2 text-right " v-text="'User: ' + $attrs.data.user.name"></div>-->
<!--        <div class="col-start-1 pt-2 pb-3" v-text="$attrs.data.category.name"></div>-->
<!--        <p class="col-span-2 col-start-1" v-html="$attrs.data.excerpt"></p>-->
<!--    </a>-->


<!--    @foreach($articles as $article)-->
    <div>
        <a :href="'/' + post_url + post.slug" class="row" style="color: black">
            <div class="col-md-2">
                <img :src="post.thumbnail"
                     alt="Thumbnail Image" class="img-rectangle img-raised img-responsive">
            </div>

            <div class="col-md-9 col-md-offset-1">
                <small v-text="getDate(post.created_at)"></small>
                <h2>
                    {{ post.title }}
                </h2>
                <span v-html="post.body.substring(0, 200) + '...'"></span>
            </div>
        </a>
        <slot></slot>
    </div>

<!--    <div class="row">-->
<!--        <hr>-->
<!--    </div>-->
<!--    @endforeach-->
</template>
<script>
import config from "./config.js"
export default {
    name: "post-preview",

    props: ["post"],

    data() {
        return {
            post_url: "",
            show_more: false,
        }
    },
    methods: {
        getDate(date) {
            date = new Date(date);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric'};
            return date.toLocaleDateString("de-DE", options);
        },
        show()
        {
            this.show_more = !this.show_more;
        }
    },

    created() {
        config.get("single_post_path")
            .then(response => this.post_url = response.replace('{key}/', ''))
            .catch(error => console.error(error));
    },
}
</script>

<style scoped>

</style>
