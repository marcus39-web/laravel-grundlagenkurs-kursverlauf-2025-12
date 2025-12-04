<template>
    <nav>
        <ul>
            <li>
                <button @click="$emit('navigate', 'welcome')">
                    Willkommen
                </button>
            </li>
            <li><button @click="$emit('navigate', 'team')">Team</button></li>
            <li>
                <button @click="$emit('navigate', 'contact')">Kontakt</button>
            </li>
            <li><button @click="$emit('navigate', 'books')">Bücher</button></li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Navigation",
};
</script>

<style scoped>
ul {
    display: flex;
    gap: 1em;
    list-style: none;
    padding: 0;
}
button {
    font-size: 1em;
    padding: 0.5em 1em;
    cursor: pointer;
}
</style>
