<script setup lang="ts">
import {
    Tabs,
    TabsContent,
    TabsList,
    TabsTrigger,
} from '@/Components/ui/tabs'

import MainNav from '@/Components/custom/MainNav.vue'
import Search from '@/Components/custom/Search.vue'
import DarkMode from '@/Components/custom/DarkMode.vue'
import UserNav from '@/Components/custom/UserNav.vue'
import Alert from '@/Components/custom/Alert.vue'
import BuildingTable from '@/Components/custom/building/BuildingTable.vue'

</script>

<template>
    <div class="flex-col md:flex">
        <div class="border-b">
            <div class="flex h-16 items-center px-4">
                <!-- <TeamSwitcher /> -->
                <MainNav class="mx-6" />
                <div class="ml-auto flex items-center space-x-4">
                    <Search />
                    <DarkMode />
                    <UserNav @open-dialog="openDialog" />
                </div>
            </div>
        </div>
        <div class="flex-1 space-y-4 p-8 pt-6">
            <div class="flex items-center justify-between space-y-2">
                <slot name="header"></slot>
            </div>
            <div v-if="$page.props.flash.success" class="alert">
                <Alert background="green">{{ $page.props.flash.success }}</Alert>
            </div>
            <div v-if="$page.props.flash.failed" class="alert">
                <Alert background="red">{{ $page.props.flash.failed }}</Alert>
            </div>
            <Tabs :default-value="$page.url !== '/bangunan' ? 'overview' : 'ibadah'" class="space-y-4">
                <TabsList v-if="$page.url === '/bangunan'">
                    <TabsTrigger value="ibadah">
                        Ibadah
                    </TabsTrigger>
                    <TabsTrigger value="pemerintahan">
                        Desa/Pemerintah
                    </TabsTrigger>
                    <TabsTrigger value="pendidikan">
                        Pendidikan
                    </TabsTrigger>
                    <TabsTrigger value="kesehatan">
                        Kesehatan
                    </TabsTrigger>
                    <TabsTrigger value="usaha">
                        Usaha/Bisnis
                    </TabsTrigger>
                    <TabsTrigger value="olahraga">
                        Olahraga
                    </TabsTrigger>
                    <TabsTrigger value="keamanan">
                        Keamanan
                    </TabsTrigger>
                    <TabsTrigger value="lainnya">
                        Lainnya
                    </TabsTrigger>
                </TabsList>
                <div v-if="$page.url !== '/bangunan'">
                    <TabsContent value="overview" class="space-y-4">
                        <slot></slot>
                    </TabsContent>
                </div>
                <div v-if="$page.url === '/bangunan'">
                    <TabsContent value="ibadah" class="space-y-4">
                        <BuildingTable category="ibadah" />
                        <slot></slot>
                    </TabsContent>
                    <TabsContent value="pemerintahan" class="space-y-4">
                        <BuildingTable category="pemerintahan" />
                        <slot></slot>
                    </TabsContent>
                    <TabsContent value="pendidikan" class="space-y-4">
                        <BuildingTable category="pendidikan" />
                        <slot></slot>
                    </TabsContent>
                    <TabsContent value="kesehatan" class="space-y-4">
                        <BuildingTable category="kesehatan" />
                        <slot></slot>
                    </TabsContent>
                    <TabsContent value="usaha" class="space-y-4">
                        <BuildingTable category="usaha" />
                        <slot></slot>
                    </TabsContent>
                    <TabsContent value="olahraga" class="space-y-4">
                        <BuildingTable category="olahraga" />
                        <slot></slot>
                    </TabsContent>
                    <TabsContent value="keamanan" class="space-y-4">
                        <BuildingTable category="keamanan" />
                        <slot></slot>
                    </TabsContent>
                    <TabsContent value="lainnya" class="space-y-4">
                        <BuildingTable category="lainnya" />
                        <slot></slot>
                    </TabsContent>
                </div>
            </Tabs>
        </div>
    </div>
</template>

<style scoped></style>
