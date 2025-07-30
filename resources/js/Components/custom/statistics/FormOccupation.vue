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
    surveyID: String,
})

const today = new Date();
today.setHours(0, 0, 0, 0);

const formSchema = toTypedSchema(z.object({
    survey_id: z.string(),
    label: z.string()
        .nonempty('Label tidak boleh kosong.')
        .max(255, 'Label tidak boleh lebih dari 255 karakter.'),
    jumlah: z.coerce.number({
        required_error: 'Jumlah wajib diisi.',
        invalid_type_error: 'Jumlah harus berupa angka.',
    }),
}));

const { handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        survey_id: props.surveyID,
        label: undefined,
        jumlah: undefined,
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
            <Button class="shadcn-btn edit-btn"><i class="fa-solid fa-plus"></i> Tambah Pekerjaan</Button>
        </DialogTrigger>
        <DialogContent class="flex flex-col">
            <DialogHeader>
                <DialogTitle>Tambah Pekerjaan</DialogTitle>
                <DialogDescription>
                    Pastikan Anda mengisi data survey yang benar.
                </DialogDescription>
            </DialogHeader>

            <form id="add-schedule-form" class="flex-1 overflow-y-auto space-y-4 py-4 pl-1 pr-6" @submit="onSubmit">
                <FormField v-slot="{ componentField }" name="label">
                    <FormItem>
                        <FormLabel>Label</FormLabel>
                        <FormControl>
                            <Input type="text" placeholder="Masukkan label" v-bind="componentField" />
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