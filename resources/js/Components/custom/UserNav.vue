<script setup lang="ts">
import {
  Avatar,
  AvatarFallback,
  AvatarImage,
} from '@/Components/ui/avatar'
import { Button } from '@/Components/ui/button'
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuGroup,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuShortcut,
  DropdownMenuTrigger,
} from '@/Components/ui/dropdown-menu'
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/Components/ui/dialog'
import { Link, usePage, router } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const user = computed(() => page.props.auth.user)

const initial = (): string => {
  const names = user.value.nama.split(' ');
  const firstNameInitial = names[0].charAt(0).toUpperCase();
  const lastNameInitial = names[names.length - 1].charAt(0).toUpperCase();

  return firstNameInitial + lastNameInitial;
}

const logout = () => {
  router.post(route('logout'))
}
</script>

<template>
  <Dialog>
    <DropdownMenu>
      <DropdownMenuTrigger as-child>
        <Button variant="ghost" class="relative h-8 w-8 rounded-full">
          <Avatar class="h-8 w-8">
            <AvatarImage src="/avatars/01.png" alt="@shadcn" />
            <AvatarFallback>{{ initial() }}</AvatarFallback>
          </Avatar>
        </Button>
      </DropdownMenuTrigger>
      <DropdownMenuContent class="w-56" align="end">
        <DropdownMenuLabel class="font-normal flex">
          <div class="flex flex-col space-y-1">
            <p class="text-sm font-medium leading-none">
              {{ user.nama }}
            </p>
            <p class="text-xs leading-none text-muted-foreground">
              {{ user.email }}
            </p>
          </div>
        </DropdownMenuLabel>
        <DropdownMenuSeparator />
        <DropdownMenuGroup>
          <Link :href="route('admin.profile')">
          <DropdownMenuItem style="cursor: pointer;">
            Profile
          </DropdownMenuItem>
          </Link>
          <DropdownMenuItem>
            <DialogTrigger class="w-full text-start">
              Log out
            </DialogTrigger>
          </DropdownMenuItem>
        </DropdownMenuGroup>
        <DropdownMenuSeparator />
      </DropdownMenuContent>
    </DropdownMenu>
    <DialogContent>
      <DialogHeader>
        <DialogTitle>Logout dari aplikasi</DialogTitle>
        <DialogDescription>
          Apakah Anda yakin ingin keluar dari aplikasi?
        </DialogDescription>
      </DialogHeader>
      <DialogFooter>
        <div>
          <Button class="shadcn-btn delete-btn" @click="logout">Logout</Button>
        </div>
      </DialogFooter>
    </DialogContent>
  </Dialog>
</template>