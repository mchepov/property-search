<script setup lang="ts">
    import { ref } from 'vue'
    import type { PropType } from 'vue'
    import type { HousesFilterParams } from '@/types/houses'
    import type { ErrorsBag } from '@/types/requests'
    import FormInput from '@/components/form/FormInput'

    const props = defineProps({
        errors: Object as PropType<ErrorsBag>,
    })

    const filters = ref<HousesFilterParams>({
        keywords: null,
        bedrooms: null,
        bathrooms: null,
        garages: null,
        storeys: null,
        price_from: null,
        price_to: null,
    })

    const emits = defineEmits<{
        search: [value: HousesFilterParams],
    }>()

    const updateFilters = () => {
        emits('search', filters.value)
    }
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-9 gap-3">
        <div class="md:col-span-2">
            <form-input
                v-model="filters.keywords"
                name="keywords"
                label="Keywords"
                placeholder="Search by keywords"
                :errors="props.errors"
                @enter="updateFilters"
            />
        </div>

        <form-input
            v-model="filters.bedrooms"
            name="bedrooms"
            label="Bedrooms"
            placeholder="Bedrooms"
            :errors="props.errors"
            @enter="updateFilters"
        />

        <form-input
            v-model="filters.bathrooms"
            name="bathrooms"
            label="Bathrooms"
            placeholder="Bathrooms"
            :errors="props.errors"
            @enter="updateFilters"
        />

        <form-input
            v-model="filters.garages"
            name="garages"
            label="Garages"
            placeholder="Garages"
            :errors="props.errors"
            @enter="updateFilters"
        />

        <form-input
            v-model="filters.storeys"
            name="storeys"
            label="Storeys"
            placeholder="Storeys"
            :errors="props.errors"
            @enter="updateFilters"
        />

        <form-input
            v-model="filters.price_from"
            name="price_from"
            label="Price from"
            placeholder="Price from"
            :errors="props.errors"
            @enter="updateFilters"
        />

        <form-input
            v-model="filters.price_to"
            name="price_to"
            label="Price to"
            placeholder="Price to"
            :errors="props.errors"
            @enter="updateFilters"
        />

        <div class="md:pt-5">
            <button
                class="bg-sky-500 hover:bg-sky-600 text-white text-sm w-full rounded-md hover:shadow-sm px-3 py-2"
                @click="updateFilters"
            >
                Search
            </button>
        </div>
    </div>
</template>
