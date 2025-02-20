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
import { inject } from 'vue';

const user = inject('user')

const formSchema = toTypedSchema(z.object({
    nama: z.string({ message: 'Nama wajib di isi' })
        .max(255, { message: 'Nama tidak boleh lebih dari 255 karakter' })
        .trim(),
    email: z.string({ message: 'Email wajib di isi' })
        .max(255, { message: 'Email tidak boleh lebih dari 255 karakter' })
        .email({ message: 'Data harus berisi email yang valid' })
        .trim(),
    telepon: z.string({ message: 'Nomor telepon wajib di isi' })
        .min(12, { message: 'Telepon minimal berisi 12 digit angka' })
        .max(15, { message: 'Telepon tidak boleh lebih dari 15 digit angka' })
        .regex(/^[0-9]+$/, { message: 'Telepon hanya boleh berisi angka' })
        .trim(),
    alamat: z.string({ message: 'Alamat wajib di isi' })
        .max(255, { message: 'Alamat tidak boleh lebih dari 255 karakter' })
        .trim(),
    status: z.enum(['Aktif', 'Nonaktif'], { message: 'Status wajib di isi' }),
}));

defineProps<{ errors: Record<string, string> }>()

const { values, isFieldDirty, handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        nama: user.nama,
        email: user.email,
        telepon: user.telepon,
        alamat: user.alamat,
        status: user.status
    },
})

const onSubmit = handleSubmit((values) => {
    router.put(route('admin.userUpdate', user.id), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors)
        }
    })
})
</script>

<template>
    <form class="w-full md:w-1/2 space-y-6" @submit="onSubmit">
        <FormField v-slot="{ componentField }" name="nama" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Nama Lengkap</FormLabel>
                <FormControl>
                    <Input type="text" autocomplete="off" placeholder="Masukkan nama lengkap" v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="email" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Email</FormLabel>
                <FormControl>
                    <Input type="email" autocomplete="off" placeholder="Masukkan email" v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="telepon" :validate-on-blur="!isFieldDirty">
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
                    <Textarea placeholder="Masukan alamat lengkap" class="resize-none" v-bind="componentField" />
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
            <Button class="shadcn-btn detail-btn" type="submit">
                Perbarui Pengguna
            </Button>
        </div>
    </form>
</template>