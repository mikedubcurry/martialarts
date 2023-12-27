import Authenticated from "@/Layouts/AuthenticatedLayout";
import { usePage } from "@inertiajs/react";
import CreateRecoveryForm from "./Partials/CreateRecoveryForm";

export default function Create() {
    const user = usePage().props.auth.user;
    return (
        <Authenticated user={user}>
            <h1 className='text-center text-2xl font-bold'>Create</h1>
            <CreateRecoveryForm />
        </Authenticated>
    );
}
