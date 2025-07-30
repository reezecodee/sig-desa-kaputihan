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
import { Textarea } from '@/components/ui/textarea'
import { Input } from '@/Components/ui/input'
import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'
import { router } from '@inertiajs/vue3'

const today = new Date();
today.setHours(0, 0, 0, 0);

const formSchema = toTypedSchema(z.object({
  kegiatan: z.string()
    .trim()
    .min(1, { message: 'Kegiatan wajib diisi.' })
    .max(255, { message: 'Kegiatan tidak boleh lebih dari 255 karakter.' }),
  kategori: z.enum(['Kegiatan Sosial', 'Keagamaan', 'Acara Desa', 'Lainnya'], {
    required_error: 'Kategori kegiatan wajib diisi.',
  }),
  mulai: z.coerce.date({
    required_error: "Tanggal mulai wajib diisi.",
  })
    .min(today, { message: "Tanggal mulai tidak boleh sebelum hari ini." }),
  selesai: z.coerce.date({
    required_error: "Tanggal selesai wajib diisi.",
  }),
  keterangan: z.string()
    .trim()
    .min(1, { message: 'Keterangan wajib diisi.' })
    .max(255, { message: 'Keterangan tidak boleh lebih dari 255 karakter.' }),
}).refine((data) => {
  if (!data.mulai || !data.selesai) return true;
  
  const startDate = new Date(data.mulai);
  startDate.setHours(0, 0, 0, 0);

  const endDate = new Date(data.selesai);
  endDate.setHours(0, 0, 0, 0);

  return endDate >= startDate;
}, {
  message: "Tanggal selesai tidak boleh sebelum tanggal mulai.",
  path: ["selesai"],
}));

const { handleSubmit, setErrors } = useForm({
  validationSchema: formSchema,
  initialValues: {
    kegiatan: undefined,
    kategori: undefined,
    mulai: undefined,
    selesai: undefined,
    keterangan: undefined,
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
      <Button class="shadcn-btn edit-btn"><i class="fa-solid fa-plus"></i> Tambah Jadwal Baru</Button>
    </DialogTrigger>
    <DialogContent class="flex h-[90vh] flex-col">
      <DialogHeader>
        <DialogTitle>Tambah Jadwal</DialogTitle>
        <DialogDescription>
          Pastikan Anda mengisi data jadwal kegiatan yang benar.
        </DialogDescription>
      </DialogHeader>

      <form id="add-schedule-form" class="flex-1 overflow-y-auto space-y-4 py-4 pl-1 pr-6" @submit="onSubmit">
        <FormField v-slot="{ componentField }" name="kegiatan">
          <FormItem>
            <FormLabel>Nama Kegiatan</FormLabel>
            <FormControl>
              <Input type="text" placeholder="Contoh: Rapat Karang Taruna" v-bind="componentField" />
            </FormControl>
            <FormMessage />
          </FormItem>
        </FormField>

        <FormField v-slot="{ componentField }" name="kategori">
          <FormItem>
            <FormLabel>Kategori Kegiatan</FormLabel>
            <Select v-bind="componentField">
              <FormControl>
                <SelectTrigger>
                  <SelectValue placeholder="Pilih kategori kegiatan" />
                </SelectTrigger>
              </FormControl>
              <SelectContent>
                <SelectItem value="Kegiatan Sosial">Kegiatan Sosial</SelectItem>
                <SelectItem value="Keagamaan">Keagamaan</SelectItem>
                <SelectItem value="Acara Desa">Acara Desa</SelectItem>
                <SelectItem value="Lainnya">Lainnya</SelectItem>
              </SelectContent>
            </Select>
            <FormMessage />
          </FormItem>
        </FormField>

        <FormField v-slot="{ componentField }" name="mulai">
          <FormItem>
            <FormLabel>Tanggal Mulai</FormLabel>
            <FormControl>
              <Input type="date" v-bind="componentField" />
            </FormControl>
            <FormMessage />
          </FormItem>
        </FormField>

        <FormField v-slot="{ componentField }" name="selesai">
          <FormItem>
            <FormLabel>Tanggal Selesai</FormLabel>
            <FormControl>
              <Input type="date" v-bind="componentField" />
            </FormControl>
            <FormMessage />
          </FormItem>
        </FormField>

        <FormField v-slot="{ componentField }" name="keterangan">
          <FormItem>
            <FormLabel>Keterangan</FormLabel>
            <FormControl>
              <Textarea placeholder="Jelaskan detail kegiatan secara singkat..." v-bind="componentField" />
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