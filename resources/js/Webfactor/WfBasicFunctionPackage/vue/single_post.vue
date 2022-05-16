<template>
<!--    <article class="m-4 border-4 p-2 rounded-3xl">-->
<!--        <h1 class="label" v-text="$attrs.data.title"></h1>-->
<!--&lt;!&ndash;        <h2 class="label" v-text="'Category: ' + $attrs.data.category.name"></h2>&ndash;&gt;-->
<!--        <h2 class="label">Body</h2>-->
<!--        <p  v-html="$attrs.data.body"></p>-->
<!--        <p class="mt-2 label">Tags: </p>-->
<!--        <p v-text="tags"></p>-->
<!--        <div v-if="$attrs.data.commentable">-->
<!--            <h2 class="mt-3">Comments: </h2>-->
<!--&lt;!&ndash;            <create_comment&ndash;&gt;-->
<!--&lt;!&ndash;                :post = "$attrs.data.slug"&ndash;&gt;-->
<!--&lt;!&ndash;                :user="user">&ndash;&gt;-->
<!--&lt;!&ndash;            </create_comment>&ndash;&gt;-->
<!--        </div>-->
<!--&lt;!&ndash;        <div class="text-red-500 text-xl" v-else>Comments are not allowed on this post!</div>&ndash;&gt;-->
<!--&lt;!&ndash;        <comment v-if="ready"&ndash;&gt;-->
<!--&lt;!&ndash;                 v-for="comment in $attrs.data.comments"&ndash;&gt;-->
<!--&lt;!&ndash;                 v-bind:data="comment"&ndash;&gt;-->
<!--&lt;!&ndash;                 v-bind:key="comment.id"&ndash;&gt;-->
<!--&lt;!&ndash;                 :current_user="user"&ndash;&gt;-->
<!--&lt;!&ndash;        ></comment>&ndash;&gt;-->
<!--    </article>-->

    <div>
        <div class="row">
            <div class="col-md-2">
                <img :src="post.thumbnail"
                     alt="Thumbnail Image" class="img-rectangle img-raised img-responsive">
            </div>

            <div class="col-md-9 col-md-offset-1">
                <small v-text="getDate(post.created_at)"></small>
                <h2>
                    {{ post.title }}
                </h2>
                <p v-html="post.body">
                </p>
            </div>
        </div>
        <a href="/">zurück zur Übersicht</a>
    </div>
</template>






<script>

export default {
    name: "single_post.vue",

    props: ["post"],

    data () {
        return {
            ready: false,
        }
    },
    methods: {
        getDate(date) {
            date = new Date(date);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric'};
            return date.toLocaleDateString("de-DE", options);
        },
    },

}
</script>
