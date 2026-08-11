<template>
<v-app>
<v-app-bar
            density="compact"
            color="primary"
            prominent
>
<v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
<v-toolbar-title>Laravel 9 SPA Training</v-toolbar-title>
</v-app-bar>
 
        <v-navigation-drawer
            v-model="drawer"
            temporary
>
<v-list density="compact" class="pt-0" >
<v-list-item
                    v-for="(item, i) in items"
                    :key="i"
                    :value="item"
                    color="primary"
                    :to="item.path"
>
<template v-slot:prepend>
<v-icon :icon="item.icon"></v-icon>
</template>
<v-list-item-title v-text="item.title"></v-list-item-title>
</v-list-item>
</v-list>
</v-navigation-drawer>
 
        <v-main>
<router-view></router-view>
</v-main>
</v-app>
</template>
 
<script>
export default {
    data: () => ({
        drawer: false,
        items: [
            {
                title: 'Home',
                path: '/',
                icon: 'mdi-home'
            },
            {
                title: 'Company',
                path: '/Company',
                icon:'mdi-information-outline'
            },
            {
                title: 'Inventory',
                path:'/Inventory',
                icon: 'mdi-archive-outline'
               
            }

        ],
    }),
}
</script>