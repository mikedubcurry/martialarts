import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link, usePage } from "@inertiajs/react";

export default function Show({ goal }) {
    const { user } = usePage().props
    console.log(goal)
    const renderProgress = () => {
        if (goal.goal_progresses.length === 0) {
            return (
                <>
                    <p>No progress yet.</p>
                    <Link href={route('goals.progress.store', goal.id)} className="btn btn-primary">Add Progress</Link>
                </>
            )
        }
        return (
            <ul className="">
                {goal.goal_progresses.map((progress) => (
                    <li key={progress.id} className="">
                        <p>{progress.note}</p>
                    </li>
                ))}
            </ul>
        )
    }
    return (
        <Authenticated user={user}>
            <h2 className="text-2xl font-bold mb-4">Goal: {goal.goal}</h2>
            {renderProgress()}
        </Authenticated>
    )
}
