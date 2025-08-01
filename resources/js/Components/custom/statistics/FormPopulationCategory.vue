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
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue
} from '@/Components/ui/select'
import { Input } from '@/Components/ui/input'
import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    surveyID: String,
    category: String,
})

const today = new Date();
today.setHours(0, 0, 0, 0);

const formSchema = toTypedSchema(z.object({
    survey_id: z.string(),
    jenis_data: z.string(),
    label: z.string()
        .nonempty('Label tidak boleh kosong.')
        .max(255, 'Label tidak boleh lebih dari 255 karakter.'),
    tahun: z.number({
        required_error: "Tahun survey wajib diisi.",
        invalid_type_error: "Tahun survey harus berupa angka.",
    })
        .int({ message: 'Tahun survey harus berupa bilangan bulat.' })
        .min(1000, { message: 'Tahun survey harus terdiri dari 4 digit.' })
        .max(9999, { message: 'Tahun survey harus terdiri dari 4 digit.' }),
    jumlah: z.coerce.number({
        required_error: 'Jumlah wajib diisi.',
        invalid_type_error: 'Jumlah harus berupa angka.',
    }),
}));

const { handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        survey_id: props.surveyID,
        jenis_data: props.category,
        label: undefined,
        tahun: undefined,
        jumlah: undefined,
    }
});

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.storePopulationCategory', props.surveyID), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors);
        }
    });
});
</script>

<template>
    <Dialog>
        <DialogTrigger>
            <Button class="shadcn-btn edit-btn"><i class="fa-solid fa-plus"></i> Tambah Kategori Penduduk</Button>
        </DialogTrigger>
        <DialogContent class="flex flex-col">
            <DialogHeader>
                <DialogTitle>Tambah Kategori Penduduk: {{ category }}</DialogTitle>
                <DialogDescription>
                    Pastikan Anda mengisi data yang benar.
                </DialogDescription>
            </DialogHeader>

            <form id="add-schedule-form" class="flex-1 overflow-y-auto space-y-4 py-4 pl-1 pr-6" @submit="onSubmit">
                <FormField v-if="category == 'Berdasarkan Mata Pencaharian'" v-slot="{ componentField }" name="label">
                    <FormItem>
                        <FormLabel>Label</FormLabel>
                        <FormControl>
                            <Input type="text" placeholder="Masukkan label" v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-if="category == 'Berdasarkan yang Pindah dan Datang'" v-slot="{ componentField }"
                    name="label">
                    <FormItem>
                        <FormLabel>Label</FormLabel>
                        <Select v-bind="componentField">
                            <FormControl>
                                <SelectTrigger>
                                    <SelectValue placeholder="Pilih label" />
                                </SelectTrigger>
                            </FormControl>
                            <SelectContent>
                                <SelectItem value="Datang">Datang</SelectItem>
                                <SelectItem value="Pindah">Pindah</SelectItem>
                            </SelectContent>
                        </Select>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="tahun">
                    <FormItem>
                        <FormLabel>Tahun</FormLabel>
                        <FormControl>
                            <Input type="number" placeholder="Contoh: 2025" v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="jumlah">
                    <FormItem>
                        <FormLabel>Jumlah</FormLabel>
                        <FormControl>
                            <Input type="number" placeholder="Contoh: 10" v-bind="componentField" />
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