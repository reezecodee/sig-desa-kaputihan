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
import { Input } from '@/Components/ui/input'
import { toast } from '@/Components/ui/toast/use-toast'

import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import { h } from 'vue'
import * as z from 'zod'

const formSchema = toTypedSchema(z.object({
    nama: z.string().max(255).trim(),
    email: z.string().email().max(255).trim(),
    telepon: z.string().min(12).max(15),
    alamat: z.string().max(255).trim()
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
            <FormField v-slot="{ componentField }" name="nama" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Nama Lengkap</FormLabel>
                    <FormControl>
                        <Input type="text" autocomplete="off" placeholder="Masukkan nama Anda" v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="email" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Email</FormLabel>
                    <FormControl>
                        <Input type="email" autocomplete="off" placeholder="Masukkan email Anda" v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="telepon" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Telepon</FormLabel>
                    <FormControl>
                        <Input type="text" autocomplete="off" placeholder="Masukkan nomor telepon Anda" v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="alamat" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Alamat</FormLabel>
                    <FormControl>
                        <Input type="text" autocomplete="off" placeholder="Masukkan alamat lengkap" v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
        </div>
        <Button type="submit">
            Perbarui Profile
        </Button>
    </form>
</template>