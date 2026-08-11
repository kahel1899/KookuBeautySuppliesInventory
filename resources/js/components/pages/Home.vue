<template>
    <div class="container">
        <v-card class="card">
            <v-card-item>
                <v-card-title><h1>HOME</h1></v-card-title>
                <v-card-subtitle
                    >This is a card for testing Pinia/Store</v-card-subtitle
                >
            </v-card-item>
            <v-card-text>
                <div class="line">
                    <h3>My name: &nbsp;</h3>
                    <p>{{ name }}</p>
                </div>
                <div class="line">
                    <h3>Var "count": &nbsp;</h3>
                    <p>{{ count }}</p>
                </div>
                <div class="line">
                    <h3>Var "count" using Getter: &nbsp;</h3>
                    <p>{{ doubleCount }}</p>
                </div>
                <div class="line">
                    <h3>Var "count" renamed to "countNew": &nbsp;</h3>
                    <p>{{ countNew }}</p>
                </div>
            </v-card-text>
            <v-card-actions>
                <v-btn @click="increment">Increment</v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
// You can also use mapWritableState instead of mapState
import { mapState, mapActions } from "pinia";
import { useSampleStore } from "../../mainStore.js";

export default {
    methods: {
        ...mapActions(useSampleStore, ["increment"]),
    },
    computed: {
        ...mapState(useSampleStore, ["count", "name", "doubleCount"]),
        ...mapState(useSampleStore, { countNew: "count" }),
    },
};
</script>

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-items: center;
    padding: 20px 20px 20px 20px;
}
.card {
    border: 1px solid black;
    padding: 20px 20px 20px 20px;
}
.line {
    display: flex;
    align-items: center;
}
</style>
