import { Link } from "@inertiajs/react";

export default function GoalList({ goals }) {
    console.log(goals)
    return (
            <div className='border border-blue-500 rounded-md px-8 pb-8 mb-8'>
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
