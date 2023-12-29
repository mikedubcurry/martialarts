import Authenticated from "@/Layouts/AuthenticatedLayout"
import { usePage } from "@inertiajs/react"
import CreateGoalForm from "./Partials/CreateGoalForm"

export default function Create({ }) {
    const { user } = usePage().props

    return (
        <Authenticated user={user}>
            <h2 className="text-2xl font-bold mb-4">Create a new goal</h2>
            <CreateGoalForm />
        </Authenticated>
    )
}
