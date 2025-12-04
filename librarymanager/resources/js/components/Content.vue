<template>
    <div>
        <component :is="currentView" />
    </div>
</template>

<script>
import Welcome from "./Welcome.vue";
import Team from "./Team.vue";
import Contact from "./Contact.vue";
import Books from "./Books.vue";

export default {
    name: "Content",
    props: ["view"],
    components: { Welcome, Team, Contact, Books },
    computed: {
        currentView() {
            switch (this.view) {
                case "welcome":
                    return "Welcome";
                case "team":
                    return "Team";
                case "contact":
                    return "Contact";
                case "books":
                    return "Books";
                default:
                    return "Welcome";
            }
        },
    },
};
</script>
