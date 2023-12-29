import { Link } from "@inertiajs/react";

export default function GoalList({ goals }) {
    return (
        <div className="">
            <ul className="">
                {goals.map((goal) => (
                    <li key={goal.id} className="">
                        <Link href={route('goals.show', goal.id)} className="">{goal.goal}</Link>
                    </li>
                ))}
            </ul>
        </div>
    )
}
