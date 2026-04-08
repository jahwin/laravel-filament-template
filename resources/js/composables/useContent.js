import { usePage, router } from '@inertiajs/vue3'
import { computed, ref } from 'vue'
import axios from 'axios'

export function useContent() {
    const page = usePage()
    const content = computed(() => page.props.content)
    const getContent = (group, key, defaultValue = '', options = {}) => {
        // Check if content exists
        const existingContent = content.value?.[group]?.[key]
        if (existingContent) return existingContent
        const form = {
            key,
            group,
            defaultValue,
            options
        };
        // Make API request to create content in background
        axios.post('/content/create', form);
        return defaultValue
    }

    return {
        content,
        getContent
    }
}
