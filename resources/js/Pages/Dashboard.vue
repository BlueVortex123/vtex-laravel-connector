<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { CubeIcon } from "@heroicons/vue/24/outline";

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-2xl font-semibold text-gray-800">
                Dashboard
            </h2>
        </template>

        <!-- Dashboard Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Stats Card 1 -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Products</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-1">1,234</h3>
                    </div>
                    <div class="bg-blue-100 rounded-full p-3">
                        <span class="text-3xl"><CubeIcon class="w-6 h-6 text-blue-500" /></span>
                    </div>
                </div>
                <p class="text-green-600 text-sm mt-4">↑ 123% from last month</p>
            </div>

            <!-- Stats Card 2 -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Categories</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-1">12</h3>
                    </div>
                    <div class="bg-purple-100 rounded-full p-3">
                        <span class="text-3xl">📁</span>
                    </div>
                </div>
            </div>            
        </div>
    </AuthenticatedLayout>
</template>
