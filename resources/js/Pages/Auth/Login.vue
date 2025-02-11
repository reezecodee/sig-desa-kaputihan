<script setup lang='ts'>
import { Button } from '@/components/ui/button'
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select'
</script>

<template>
    <div class="flex justify-center items-center min-h-screen">
        <Card class="w-1/2">
            <CardHeader>
                <CardTitle>Login ke Aplikasi</CardTitle>
                <CardDescription>Pastikan data yang kamu masukkan valid.</CardDescription>
            </CardHeader>
            <CardContent>
                <form>
                    <div class="grid items-center w-full gap-4">
                        <div class="flex flex-col space-y-1.5">
                            <Label for="email_or_telp">Email/Telepon</Label>
                            <Input id="email_or_telp" placeholder="Masukkan email/nomor telepon" />
                        </div>
                        <div class="flex flex-col space-y-1.5">
                            <Label for="password">Password</Label>
                            <Input id="password" placeholder="Masukkan password Anda" />
                        </div>
                    </div>
                </form>
            </CardContent>
            <CardFooter class="flex justify-between px-6 pb-6">
                <Button variant="outline">
                    Kembali
                </Button>
                <Button>Log In</Button>
            </CardFooter>
        </Card>
    </div>

</template>