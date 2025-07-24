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

const coordinateRegex = /^-?[\d.]+(,)\s*-?[\d.]+$/;

const formSchema = toTypedSchema(z.object({
    nama_lokasi: z.string()
        .trim()
        .min(1, { message: 'Nama lokasi wajib diisi.' })
        .max(255, { message: 'Nama lokasi tidak boleh lebih dari 255 karakter.' }),

    koordinat: z.string()
        .trim()
        .min(1, { message: 'Titik koordinat wajib diisi.' })
        .regex(coordinateRegex, { message: 'Format koordinat tidak valid. Contoh: -6.123, 106.456' }),

    link: z.string()
        .trim()
        .min(1, { message: 'Link lokasi wajib diisi.' }) 
        .url({ message: 'Link harus berupa URL yang valid.' }), 

    warna: z.enum(['red', 'yellow', 'green', 'blue'], {
        required_error: 'Silakan pilih warna penanda.',
    }),
}));

const { handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        nama_lokasi: undefined,
        koordinat: undefined,
        link: undefined,
        warna: undefined,
    }
});

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.locationSave'), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors);
        }
    });
});
</script>

<template>
    <Dialog>
        <DialogTrigger>
            <Button class="shadcn-btn edit-btn">Tambah Lokasi Baru</Button>
        </DialogTrigger>

        <DialogContent class="flex h-[90vh] flex-col">
            <DialogHeader class="flex-shrink-0">
                <DialogTitle>Tambah Lokasi</DialogTitle>
                <DialogDescription>
                    Pastikan Anda mengisi data lokasi yang benar.
                </DialogDescription>
            </DialogHeader>

            <form id="add-location-form" class="flex-1 overflow-y-auto space-y-4 py-4 pl-1 pr-6" @submit="onSubmit">
                <FormField v-slot="{ componentField }" name="nama_lokasi">
                    <FormItem>
                        <FormLabel>Nama Lokasi</FormLabel>
                        <FormControl>
                            <Input type="text" autocomplete="off" placeholder="Masukkan nama lokasi"
                                v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="koordinat">
                    <FormItem>
                        <FormLabel>Titik Koordinat</FormLabel>
                        <FormControl>
                            <Input type="text" autocomplete="off" placeholder="Contoh: -7.123, 108.456"
                                v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="link">
                    <FormItem>
                        <FormLabel>Link Lokasi</FormLabel>
                        <FormControl>
                            <Input type="text" autocomplete="off" placeholder="Masukkan link lokasi"
                                v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="warna">
                    <FormItem>
                        <FormLabel>Warna Penanda</FormLabel>
                        <Select v-bind="componentField">
                            <FormControl>
                                <SelectTrigger>
                                    <SelectValue placeholder="Pilih warna" />
                                </SelectTrigger>
                            </FormControl>
                            <SelectContent>
                                <SelectGroup>
                                    <SelectLabel>Warna</SelectLabel>
                                    <SelectItem value="red">Merah</SelectItem>
                                    <SelectItem value="yellow">Kuning</SelectItem>
                                    <SelectItem value="green">Hijau</SelectItem>
                                    <SelectItem value="blue">Biru</SelectItem>
                                </SelectGroup>
                            </SelectContent>
                        </Select>
                        <FormMessage />
                    </FormItem>
                </FormField>
            </form>

            <DialogFooter class="flex-shrink-0">
                <Button type="submit" form="add-location-form" class="shadcn-btn edit-btn">Tambahkan</Button>
            </DialogFooter>
        </DialogContent>
    </Dialog>
</template>