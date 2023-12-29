import Authenticated from "@/Layouts/AuthenticatedLayout";
import EditGoalForm from "./Partials/EditGoalForm";
import { usePage } from "@inertiajs/react";

export default function Edit({ goal }) {
    const { user } = usePage().props
    return (
        <Authenticated user={user}>
            <h2 className="text-2xl font-bold mb-4">Edit goal: {goal.goal}</h2>
            <EditGoalForm goal={goal} />
        </Authenticated>
    )
}
