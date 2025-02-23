<script setup lang="ts">
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/Components/ui/dialog'
import { Button } from '@/Components/ui/button'
import {
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/Components/ui/form'
import {
    Select, SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from '@/Components/ui/select'
import { Input } from '@/Components/ui/input'
import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'
import { router } from '@inertiajs/vue3'

const formSchema = toTypedSchema(z.object({
    nama_lokasi: z.string({ message: 'Nama lokasi wajib di isi' })
        .max(255, { message: 'Nama lokasi tidak boleh lebih dari 255 karakter' })
        .trim(),
    koordinat: z.string({ message: 'Koordinat lokasi wajib di isi' })
        .max(255, { message: 'Koordinat lokasi tidak boleh lebih dari 255 karakter' })
        .trim(),
    link: z.string({ message: 'Link lokasi wajib di isi' })
        .trim(),
    warna: z.enum(['red', 'yellow', 'green', 'blue'], { message: 'Warna penanda wajib di isi' }),
}));

defineProps<{ errors: Record<string, string[]> }>()

const { values, isFieldDirty, handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        nama_lokasi: null,
        koordinat: null,
        link: null,
        warna: null,
    }
})

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.locationSave'), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors)
        }
    })
})
</script>

<template>
    <Dialog>
        <DialogTrigger>
            <Button class="shadcn-btn detail-btn">Tambah Lokasi Baru</Button>
        </DialogTrigger>
        <DialogContent>
            <form class="w-full space-y-6" @submit="onSubmit">
                <DialogHeader>
                    <DialogTitle>Tambah Lokasi</DialogTitle>
                    <DialogDescription>
                        Pastikan Anda mengisi data lokasi yang benar.
                    </DialogDescription>
                    <FormField v-slot="{ componentField }" name="nama_lokasi" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Nama Lokasi</FormLabel>
                            <FormControl>
                                <Input type="text" autocomplete="off" placeholder="Masukkan nama lokasi"
                                    v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <FormField v-slot="{ componentField }" name="koordinat" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Titik Koordinat</FormLabel>
                            <FormControl>
                                <Input type="text" autocomplete="off" placeholder="Masukkan titik koordinat"
                                    v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <FormField v-slot="{ componentField }" name="link" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Link Lokasi</FormLabel>
                            <FormControl>
                                <Input type="text" autocomplete="off" placeholder="Masukkan link lokasi"
                                    v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <FormField v-slot="{ componentField }" name="warna" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Warna Penanda</FormLabel>
                            <FormControl>
                                <Select v-bind="componentField">
                                    <SelectTrigger>
                                        <SelectValue placeholder="Pilih warna" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectGroup>
                                            <SelectLabel>Warna</SelectLabel>
                                            <SelectItem value="red">
                                                Merah
                                            </SelectItem>
                                            <SelectItem value="yellow">
                                                Kuning
                                            </SelectItem>
                                            <SelectItem value="green">
                                                Hijau
                                            </SelectItem>
                                            <SelectItem value="blue">
                                                Biru
                                            </SelectItem>
                                        </SelectGroup>
                                    </SelectContent>
                                </Select>
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                </DialogHeader>

                <DialogFooter>
                    <Button type="submit" class="shadcn-btn detail-btn">Tambahkan</Button>
                </DialogFooter>
            </form>
        </DialogContent>
    </Dialog>
</template>

<style scoped></style>