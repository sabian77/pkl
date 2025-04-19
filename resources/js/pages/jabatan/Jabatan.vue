<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Jabatan',
        href: '/jabatan',
    },
];
</script>

<template>
    <Head title="Jabatan" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
    <h2>tes</h2>
    </AppLayout>
</template>
