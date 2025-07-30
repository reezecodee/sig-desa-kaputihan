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
import { Input } from '@/Components/ui/input'
import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    surveyID: String
})

const today = new Date();
today.setHours(0, 0, 0, 0);

const formSchema = toTypedSchema(z.object({
    survey_id: z.string(),
    rentang_umur: z.string()
        .nonempty('Rentang umur tidak boleh kosong.')
        .max(255, 'Rentang umur tidak boleh lebih dari 255 karakter.'),
    laki_laki: z.coerce.number({
        required_error: 'Jumlah laki-laki wajib diisi.',
        invalid_type_error: 'Jumlah laki-laki harus berupa angka.',
    }),
    perempuan: z.coerce.number({
        required_error: 'Jumlah perempuan wajib diisi.',
        invalid_type_error: 'Jumlah perempuan harus berupa angka.',
    }),
}));

const { handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        survey_id: props.surveyID,
        rentang_umur: undefined,
        laki_laki: undefined,
        perempuan: undefined,
    }
});

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.scheduleSave'), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors);
        }
    });
});
</script>

<template>
    <Dialog>
        <DialogTrigger>
            <Button class="shadcn-btn edit-btn"><i class="fa-solid fa-plus"></i> Tambah Kelompok Penduduk</Button>
        </DialogTrigger>
        <DialogContent class="flex flex-col">
            <DialogHeader>
                <DialogTitle>Tambah Kelompok Penduduk</DialogTitle>
                <DialogDescription>
                    Pastikan Anda mengisi data yang benar.
                </DialogDescription>
            </DialogHeader>

            <form id="add-schedule-form" class="flex-1 overflow-y-auto space-y-4 py-4 pl-1 pr-6" @submit="onSubmit">
                <FormField v-slot="{ componentField }" name="rentang_umur">
                    <FormItem>
                        <FormLabel>Rentang Umur</FormLabel>
                        <FormControl>
                            <Input type="text" placeholder="Contoh: 1-10" v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="laki_laki">
                    <FormItem>
                        <FormLabel>Jumlah Laki-laki</FormLabel>
                        <FormControl>
                            <Input type="number" placeholder="Masukkan jumlah laki-laki" v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="perempuan">
                    <FormItem>
                        <FormLabel>Jumlah Perempuan</FormLabel>
                        <FormControl>
                            <Input type="number" placeholder="Masukkan jumlah perempuan" v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>
            </form>

            <DialogFooter>
                <Button type="submit" form="add-schedule-form" class="shadcn-btn edit-btn">Simpan</Button>
            </DialogFooter>
        </DialogContent>
    </Dialog>
</template>