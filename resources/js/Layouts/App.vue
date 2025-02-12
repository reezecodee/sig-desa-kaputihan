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
    <div class="md:hidden">
        <VPImage alt="Dashboard" width="1280" height="1214" class="block" :image="{
            dark: '/examples/dashboard-dark.png',
            light: '/examples/dashboard-light.png',
        }" />
    </div>

    <div class="hidden flex-col md:flex">
        <div class="border-b">
            <div class="flex h-16 items-center px-4">
                <!-- <TeamSwitcher /> -->
                <MainNav class="mx-6" />
                <div class="ml-auto flex items-center space-x-4">
                    <Search />
                    <DarkMode />
                    <UserNav />
                </div>
            </div>
        </div>
        <div class="flex-1 space-y-4 p-8 pt-6">
            <div class="flex items-center justify-between space-y-2">
                <slot name="header"></slot>
            </div>
            <Tabs default-value="overview" class="space-y-4">
                <TabsList v-if="$page.url.startsWith('/dashboard')">
                    <TabsTrigger value="overview">
                        Overview
                    </TabsTrigger>
                    <TabsTrigger value="analytics" disabled>
                        Analytics
                    </TabsTrigger>
                    <TabsTrigger value="reports" disabled>
                        Reports
                    </TabsTrigger>
                    <TabsTrigger value="notifications" disabled>
                        Notifications
                    </TabsTrigger>
                </TabsList>
                <TabsContent value="overview" class="space-y-4">
                    <div v-if="$page.props.flash.success" class="alert">
                        <SuccessAlert>{{ $page.props.flash.success }}</SuccessAlert>
                    </div>
                    <div v-if="$page.props.flash.failed" class="alert">
                        <DangerAlert>{{ $page.props.flash.failed }}</DangerAlert>
                    </div>
                    <slot></slot>
                </TabsContent>
            </Tabs>
        </div>
    </div>
</template>

<style scoped>
</style>
