<template>
        <li v-if="navItem.children.length > 0" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" v-text="navItem.name"><b
                class="caret"></b></a>
            <ul class="dropdown-menu">
                <li v-for="subMenuItem in this.navItem.children">
                    <a :href="subMenuItem.absolute_link">{{ subMenuItem.name }}</a>
                </li>
            </ul>
        </li>
        <li v-else-if="!navItem.parent_id">
            <a :href="navItem.absolute_link">{{ navItem.name }}</a>
        </li>


</template>

<script>
export default {
    name: "nav_element",

    props: {
        navItem: Object,
    },

    methods: {
        // url() {
        //     switch (this.navItem.type)
        //     {
        //         case 'external_link':
        //             return this.navItem.link;
        //         // case 'internal_link':
        //         //     return (this.link) ? url($this.link) : url('');
        //         default:
        //             return this.navItem.link;
        //     }
        // }
    },


    data() {
        return {

        }
    }
}
</script>

