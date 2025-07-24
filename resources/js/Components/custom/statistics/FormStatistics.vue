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
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue
} from '@/components/ui/select'
import { Input } from '@/Components/ui/input'
import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'
import { router } from '@inertiajs/vue3'

const today = new Date();
today.setHours(0, 0, 0, 0);

const formSchema = toTypedSchema(z.object({
    tahun_survey: z.string()
        .length(4, { message: 'Tahun survey harus terdiri dari 4 digit.' })
        .regex(/^\d{4}$/, { message: 'Tahun survey harus berupa angka.' }),
    diaktifkan: z.enum(['Ya', 'Tidak'], {
        required_error: 'Status survey wajib diisi.',
    }),
}));

const { handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        tahun_survey: undefined,
        diaktifkan: undefined,
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
            <Button class="shadcn-btn edit-btn">Tambah Survey Baru</Button>
        </DialogTrigger>
        <DialogContent class="flex flex-col">
            <DialogHeader>
                <DialogTitle>Tambah Jadwal</DialogTitle>
                <DialogDescription>
                    Pastikan Anda mengisi data survey statistik yang benar.
                </DialogDescription>
            </DialogHeader>

            <form id="add-schedule-form" class="flex-1 overflow-y-auto space-y-4 py-4 pl-1 pr-6" @submit="onSubmit">
                <FormField v-slot="{ componentField }" name="tahun_survey">
                    <FormItem>
                        <FormLabel>Tahun Survey</FormLabel>
                        <FormControl>
                            <Input type="number" placeholder="Contoh: 2025" v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="diaktifkan">
                    <FormItem>
                        <FormLabel>Status Survey</FormLabel>
                        <Select v-bind="componentField">
                            <FormControl>
                                <SelectTrigger>
                                    <SelectValue placeholder="Pilih status aktif survey statistik" />
                                </SelectTrigger>
                            </FormControl>
                            <SelectContent>
                                <SelectItem value="Ya">Ya</SelectItem>
                                <SelectItem value="Tidak">Tidak</SelectItem>
                            </SelectContent>
                        </Select>
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