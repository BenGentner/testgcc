<template>
    <div class="collapse navbar-collapse pull-right">
        <ul class="nav navbar-nav">
            <nav_element v-for="nav_element in nav_elements"
                         :nav-item="nav_element"
                         v-bind:key="nav_element.id"
            ></nav_element>
        </ul>

    </div>

</template>

<script type="module">

import Nav_element from "./nav_element";
export default {
    name: "navigation.vue",
    components: {Nav_element},
    data() {
        return {
            nav_elements: []
        }
    },

    created() {
        axios.get("/api/nav-items")
            .then(response => this.nav_elements = response.data);
    },
}
</script>

