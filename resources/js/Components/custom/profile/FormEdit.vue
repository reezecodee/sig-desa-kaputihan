<script setup lang="ts">
import { router, usePage } from '@inertiajs/vue3'
import { Button } from '@/Components/ui/button'
import {
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/Components/ui/form'
import { Input } from '@/Components/ui/input'

import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'
import { computed } from 'vue'

const formSchema = toTypedSchema(z.object({
    nama: z.string({ message: 'Nama wajib di isi' }).max(255, { message: 'Nama tidak boleh lebih dari 255 karakter' }).trim(),
    email: z.string({ message: 'Email wajib di isi' }).email({ message: 'Data harus berupa email' }).max(255, { message: 'Email tidak boleh lebih dari 255 karakter' }).trim(),
    telepon: z.string({ message: 'Nomor telepon wajib di isi' }).min(12, { message: 'Nomor telepon minimal berisi 12 digit angka' }).max(15, { message: 'Nomor telepon tidak boleh lebih dari 15 digit angka' }).trim(),
    alamat: z.string({ message: 'Alamat wajib di isi' }).max(255, { message: 'Alamat tidak boleh lebih dari 255 karakter' }).trim()
}))

defineProps<{ errors: Record<string, string> }>()

const page = usePage()
const user = computed(() => page.props.auth.user)

const { values, isFieldDirty, handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        nama: user.value.nama,
        email: user.value.email,
        telepon: user.value.telepon,
        alamat: user.value.alamat,
    }
})

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.editProfile'), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors)
        }
    })
})


</script>

<template>
    <form class="w-full space-y-6" @submit="onSubmit">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <FormField v-slot="{ componentField }" name="nama" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Nama Lengkap</FormLabel>
                    <FormControl>
                        <Input type="text" autocomplete="off" placeholder="Masukkan nama Anda"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="email" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Email</FormLabel>
                    <FormControl>
                        <Input type="email" autocomplete="off" placeholder="Masukkan email Anda"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="telepon" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Telepon</FormLabel>
                    <FormControl>
                        <Input type="text" autocomplete="off" placeholder="Masukkan nomor telepon Anda"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="alamat" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Alamat</FormLabel>
                    <FormControl>
                        <Input type="text" autocomplete="off" placeholder="Masukkan alamat lengkap"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
        </div>
        <Button class="shadcn-btn detail-btn" type="submit">
            Perbarui Profile
        </Button>
    </form>
</template>