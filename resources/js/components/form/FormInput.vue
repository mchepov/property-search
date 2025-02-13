<script setup lang="ts">
    import { computed } from 'vue'
    import type { ErrorsBag } from '@/types/requests'

    interface InputProps {
        name: string,
        label?: string,
        placeholder?: string,
        type?: string,
        modelValue?: string|number,
        inputClass?: string,
        labelClass?: string,
        disabled?: boolean,
        errors?: ErrorsBag,
    }

    const props = withDefaults(defineProps<InputProps>(), {
        disabled: false,
        type: 'text',
        inputClass: 'w-full',
        labelClass: 'text-xs text-slate-600 mb-1',
    })

    const emits = defineEmits<{
        'update:model-value': [value?: string|number],
        'enter': [value?: string|number],
    }>()

    const content = computed<string|number>({
        get() {
            return props.modelValue
        },
        set(value) {
            emits('update:model-value', value)
        }
    })

    const hasError = computed<boolean>(() => {
        return !!props.errors?.[props.name]
    })
    const errorMessage = computed<string|null>(() => {
        return props.errors?.[props.name]?.[0] || null
    })
    const inputStyle = computed<object>(() => {
        return {
            'border border-red-500': hasError.value,
            [props.inputClass]: true,
        }
    })
</script>

<template>
    <div>
        <label
            v-if="label || $slots.label"
            :for="`form-${ name }`"
            class="block"
            :class="labelClass"
        >
            <slot name="label">
                {{ label }}
            </slot>
        </label>

        <div>
            <input
                v-model="content"
                class="text-sm rounded-md border-gray-300 shadow-sm placeholder-slate-300 focus:border-slate-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50"
                :id="`form-${ name }`"
                :class="inputStyle"
                :type="props.type"
                :placeholder="placeholder"
                :disabled="disabled"
                @keydown.enter="emits('enter', ($event.target as HTMLInputElement).value)"
            >
        </div>

        <p
            v-if="hasError"
            class="text-red-500 text-left text-xs p-1"
        >
            {{ errorMessage }}
        </p>
    </div>
</template>
