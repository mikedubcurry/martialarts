import Authenticated from "@/Layouts/AuthenticatedLayout";
import { usePage } from "@inertiajs/react";

export default function Index({ goals }) {
    const { user } = usePage().props


    return (
        <Authenticated user={user}>
            <h1 className='text-2xl font-bold'>Goals</h1>
        </Authenticated>
    )
}
