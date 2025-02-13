<script setup lang="ts">
    import { computed } from 'vue'
    import type { HouseItem } from '@/types/houses'

    const props = defineProps({
        items: Array<HouseItem>
    })

    const hasItems = computed((): boolean => {
        return !!props.items?.length
    })

    const formatPrice = (value: number) => {
        return value.toLocaleString('en-US', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        })
    }
</script>

<template>
    <div>
        <table
            v-if="hasItems"
            class="table"
        >
            <thead>
                <tr>
                    <th scope="col">
                        Name
                    </th>

                    <th scope="col" class="text-right">
                        Price
                    </th>

                    <th scope="col" class="text-right">
                        Bedrooms
                    </th>

                    <th scope="col" class="text-right">
                        Bathrooms
                    </th>

                    <th scope="col" class="text-right">
                        Storeys
                    </th>

                    <th scope="col" class="text-right">
                        Garages
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr
                    v-for="item in items"
                    :key="item.id"
                >
                    <td>
                        {{ item.title }}
                    </td>

                    <td class="text-right">
                        {{ formatPrice(item.price) }}
                    </td>

                    <td class="text-right">
                        {{ item.bedrooms }}
                    </td>

                    <td class="text-right">
                        {{ item.bathrooms }}
                    </td>

                    <td class="text-right">
                        {{ item.storeys }}
                    </td>

                    <td class="text-right">
                        {{ item.garages }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
