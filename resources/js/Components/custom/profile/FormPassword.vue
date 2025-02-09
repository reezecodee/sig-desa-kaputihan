<script setup lang="ts">
import { Button } from '@/components/ui/button'
import {
    FormControl,
    FormDescription,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/components/ui/form'
import { Input } from '@/components/ui/input'
import { toast } from '@/Components/ui/toast/use-toast'

import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import { h } from 'vue'
import * as z from 'zod'

const formSchema = toTypedSchema(
    z.object({
        current_password: z.string().max(20, "Password lama maksimal 20 karakter"),
        new_password: z.string().min(8, "Password minimal 8 karakter").max(20, "Password maksimal 20 karakter"),
        confirm_password: z.string(),
    })
    .refine((data) => data.new_password === data.confirm_password, {
        path: ["confirm_password"],
        message: "Konfirmasi password tidak sesuai dengan password baru",
}))

const { isFieldDirty, handleSubmit } = useForm({
    validationSchema: formSchema,
})

const onSubmit = handleSubmit((values) => {
    toast({
        title: 'You submitted the following values:',
        description: h('pre', { class: 'mt-2 w-[340px] rounded-md bg-slate-950 p-4' }, h('code', { class: 'text-white' }, JSON.stringify(values, null, 2))),
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
                        <Input type="text" autocomplete="off" placeholder="Masukkan password saat ini"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="new_password" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Password Baru</FormLabel>
                    <FormControl>
                        <Input type="text" autocomplete="off" placeholder="Masukkan password baru"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="confirm_password" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Konfirmasi Password</FormLabel>
                    <FormControl>
                        <Input type="text" autocomplete="off" placeholder="Konfirmasi password baru"
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