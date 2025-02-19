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

import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'

const formSchema = toTypedSchema(
    z.object({
        current_password: z.string({ message: 'Password saat ini harus di isi' }),
        new_password: z.string({ message: 'Password baru harus di isi' }).min(8, "Password minimal 8 karakter").max(20, "Password maksimal 20 karakter"),
        confirm_password: z.string({ message: 'Konfirmasi password harus di isi' }),
    })
        .refine((data) => data.new_password === data.confirm_password, {
            path: ["confirm_password"],
            message: "Konfirmasi password tidak sesuai dengan password baru",
        }))

defineProps<{ errors: Record<string, string> }>()

const { isFieldDirty, handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
})

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.changePassword'), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors)
        }
    })
})
</script>

<template>
    <form class="w-full space-y-6" @submit="onSubmit">
        <div class="grid grid-cols-3 gap-3">
            <FormField v-slot="{ componentField }" name="current_password" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Password Saat Ini</FormLabel>
                    <FormControl>
                        <Input type="password" autocomplete="off" placeholder="Masukkan password saat ini"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="new_password" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Password Baru</FormLabel>
                    <FormControl>
                        <Input type="password" autocomplete="off" placeholder="Masukkan password baru"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="confirm_password" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Konfirmasi Password</FormLabel>
                    <FormControl>
                        <Input type="password" autocomplete="off" placeholder="Konfirmasi password baru"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
        </div>
        <Button type="submit">
            Perbarui Password
        </Button>
    </form>
</template>