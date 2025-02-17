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
import SuccessAlert from '@/Components/custom/SuccessAlert.vue'
import DangerAlert from '@/Components/custom/DangerAlert.vue'

</script>

<template>
    <div class="hidden flex-col md:flex">
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
                <SuccessAlert>{{ $page.props.flash.success }}</SuccessAlert>
            </div>
            <div v-if="$page.props.flash.failed" class="alert">
                <DangerAlert>{{ $page.props.flash.failed }}</DangerAlert>
            </div>
            <Tabs :default-value="!$page.url.startsWith('/bangunan') ? 'overview' : 'ibadah'" class="space-y-4">
                <TabsList v-if="$page.url.startsWith('/bangunan')">
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
                    <TabsTrigger value="lainnya">
                        Lainnya
                    </TabsTrigger>
                </TabsList>
                <div v-if="!$page.url.startsWith('/bangunan')">
                    <TabsContent value="overview" class="space-y-4">
                        <slot></slot>
                    </TabsContent>
                </div>
                <div v-if="$page.url.startsWith('/bangunan')">
                    <TabsContent value="ibadah" class="space-y-4">
                        p
                        <slot></slot>
                    </TabsContent>
                    <TabsContent value="pemerintahan" class="space-y-4">
                        q
                        <slot></slot>
                    </TabsContent>
                    <TabsContent value="pendidikan" class="space-y-4">
                        r
                        <slot></slot>
                    </TabsContent>
                </div>
            </Tabs>
        </div>
    </div>
</template>

<style scoped></style>
