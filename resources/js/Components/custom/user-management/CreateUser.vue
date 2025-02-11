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
    router.post(route('admin.blogSave'), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors)
        }
    })
})
</script>

<template>
    <form class="w-1/2 space-y-6" @submit="onSubmit">
        <FormField v-slot="{ componentField }" name="nama" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Nama Lengkap</FormLabel>
                <FormControl>
                    <Input type="text" autocomplete="off" placeholder="Masukkan nama lengkap"
                        v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="Email" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Email</FormLabel>
                <FormControl>
                    <Input type="email" autocomplete="off" placeholder="Masukkan email"
                        v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="Telepon" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Telepon</FormLabel>
                <FormControl>
                    <Input type="text" autocomplete="off" placeholder="Masukkan nomor telepon"
                        v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="alamat" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Alamat Lengkap</FormLabel>
                <FormControl>
                    <Textarea placeholder="Masukan alamat lengkap" class="resize-none"
                        v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="status" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Status Akun</FormLabel>
                <FormControl>
                    <Select v-bind="componentField">
                        <SelectTrigger>
                            <SelectValue placeholder="Pilih status akun" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Status</SelectLabel>
                                <SelectItem value="Aktif">
                                    Aktif
                                </SelectItem>
                                <SelectItem value="Nonaktif">
                                    Nonaktif
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <div class="flex justify-end">
            <Button type="submit">
                Simpan Pengguna
            </Button>
        </div>
    </form>
</template>