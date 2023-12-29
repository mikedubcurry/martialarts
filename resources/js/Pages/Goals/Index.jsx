import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link, usePage } from "@inertiajs/react";
import GoalList from "./Partials/GoalList";

export default function Index({ goals }) {
    const { user } = usePage().props

    console.log(goals)
    return (
        <Authenticated user={user}>
            <h1 className='text-2xl font-bold'>Goals</h1>
            <div className="">
                <Link href={route('goals.create')} className="btn btn-primary">Create a New Goal</Link>
            </div>
            <GoalList goals={goals} />
        </Authenticated>
    )
}
