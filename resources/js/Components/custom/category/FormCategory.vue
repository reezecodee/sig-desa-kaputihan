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
import Button from '@/components/ui/button/Button.vue'
import {
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/Components/ui/form'
import { Textarea } from '@/components/ui/textarea'
import { Input } from '@/Components/ui/input'
import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'
import { router } from '@inertiajs/vue3'

const today = new Date();
today.setHours(0, 0, 0, 0);

const formSchema = toTypedSchema(z.object({
    nama_kategori: z.string()
        .nonempty('Nama kategori wajib diisi.')
        .max(255, 'Nama kategori tidak boleh lebih dari 255 karakter.'),

    icon: z.string()
        .nonempty('Ikon wajib dipilih atau diunggah.'),

    deskripsi: z.string()
        .nonempty('Deskripsi wajib diisi.'),
}));

const { handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        nama_kategori: undefined,
        icon: undefined,
        deskripsi: undefined,
    }
});

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.categorySave'), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors);
        }
    });
});
</script>

<template>
    <Dialog>
        <DialogTrigger>
            <Button class="shadcn-btn edit-btn"><i class="fa-solid fa-plus"></i> Tambah Kategori Baru</Button>
        </DialogTrigger>
        <DialogContent class="flex flex-col">
            <DialogHeader>
                <DialogTitle>Tambah Kategori Bangunan</DialogTitle>
                <DialogDescription>
                    Pastikan Anda mengisi data kategori bangunan yang benar.
                </DialogDescription>
            </DialogHeader>

            <form id="add-schedule-form" class="flex-1 overflow-y-auto space-y-4 py-4 pl-1 pr-6" @submit="onSubmit">
                <FormField v-slot="{ componentField }" name="nama_kategori">
                    <FormItem>
                        <FormLabel>Nama Kategori</FormLabel>
                        <FormControl>
                            <Input type="text" placeholder="Contoh: Bangunan Ibadah" v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="icon">
                    <FormItem>
                        <FormLabel>Icon</FormLabel>
                        <FormControl>
                            <Textarea placeholder="Masukkan tag icon dari website font-awesome"
                                v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <div class="mt-2 flex justify-end">
                    <a href="https://fontawesome.com/v5/search" target="_blank">
                        <Button class="shadcn-btn detail-btn">
                            <i class="bi bi-search"></i> 
                            Cari icon
                        </Button>
                    </a>
                </div>

                <FormField v-slot="{ componentField }" name="deskripsi">
                    <FormItem>
                        <FormLabel>Deskripsi</FormLabel>
                        <FormControl>
                            <Textarea placeholder="Masukkan deskripsi dari kategori bangunan" v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>
            </form>

            <DialogFooter>
                <Button type="submit" form="add-schedule-form" class="shadcn-btn edit-btn">Tambahkan</Button>
            </DialogFooter>
        </DialogContent>
    </Dialog>
</template>