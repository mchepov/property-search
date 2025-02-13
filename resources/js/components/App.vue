<script setup lang="ts">
    import { ref, onMounted } from 'vue'
    import _ from 'lodash'
    import axios from 'axios'
    import type { AxiosError, AxiosRequestConfig, AxiosResponse } from 'axios'
    import type { HousesFilterParams, HouseItem } from '@/types/houses'
    import type { ErrorsBag, ErrorResponse } from '@/types/requests'
    import HousesFilter from '@/components/houses/HousesFilter'
    import HousesTable from '@/components/houses/HousesTable'
    import LoadingIndicator from '@/components/LoadingIndicator'

    const loading = ref<boolean>(false)
    const items = ref<Array<HouseItem>>([])
    const requestErrors = ref<ErrorsBag>({})

    const searchHouses = (values: HousesFilterParams) => {
        if (loading.value) return

        loading.value = true
        const params: HousesFilterParams = _.cloneDeep(values)

        axios.get('/houses', { params } as AxiosRequestConfig).then((response: AxiosResponse) => {
            items.value = response.data.data
        }).catch((errors: AxiosError<ErrorResponse>) => {
            requestErrors.value = errors.response.data.errors
        }).finally(() => loading.value = false)
    }

    onMounted(() => {
        searchHouses({})
    })
</script>

<template>
    <div class="p-8 container mx-auto">
        <houses-filter
            class="mb-4"
            :errors="requestErrors"
            @search="searchHouses"
        />

        <loading-indicator v-if="loading" />

        <houses-table :items="items" />
    </div>
</template>
