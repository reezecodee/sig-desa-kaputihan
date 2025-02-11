<script setup lang="ts">
import { router } from '@inertiajs/vue3'
import { Button } from '@/Components/ui/button'
import {
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/Components/ui/form'
import { Input } from '@/Components/ui/input'
import { Textarea } from '@/Components/ui/textarea'
import {
    Select, SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from '@/Components/ui/select'

import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'

const formSchema = toTypedSchema(z.object({
    nama: z.string({ message: 'Nama wajib di isi' }).max(255, { message: 'Nama tidak boleh lebih dari 255 karakter' }).trim(),
}))

defineProps<{ errors: Record<string, string> }>()

const { isFieldDirty, handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
})

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.sendRespond'), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors)
        }
    })
})
</script>

<template>
    <form class="space-y-6" @submit="onSubmit">
        <FormField v-slot="{ componentField }" name="status" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Status Aduan</FormLabel>
                <FormControl>
                    <Select v-bind="componentField">
                        <SelectTrigger>
                            <SelectValue placeholder="Pilih status" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Status</SelectLabel>
                                <SelectItem value="Ditinjau">
                                    Ditinjau
                                </SelectItem>
                                <SelectItem value="Diproses">
                                    Diproses
                                </SelectItem>
                                <SelectItem value="Selesai">
                                    Selesai
                                </SelectItem>
                                <SelectItem value="Ditolak">
                                    Ditolak
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="tanggapan" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Tanggapan</FormLabel>
                <FormControl>
                    <Textarea placeholder="Masukan tanggapan terhadap aduan" class="resize-none"
                        v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <div class="flex justify-end">
            <Button type="submit">
                Kirim Respon
            </Button>
        </div>
    </form>
</template>