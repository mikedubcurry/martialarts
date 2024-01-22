import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link, usePage } from "@inertiajs/react";
import GoalList from "./Partials/GoalList";

export default function Index({ goals }) {
    const { user } = usePage().props

    return (
        <Authenticated user={user}>
            <div className='flex gap-4 my-8'>
                <span className=''>
                    <Link href={route('goals.create')} className='w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Create a New Goal</Link>
                </span>
            </div>
            <h1 className='text-2xl font-bold'>Goals</h1>
            <GoalList goals={goals} />
        </Authenticated>
    )
}
