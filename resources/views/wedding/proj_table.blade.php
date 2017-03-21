		
					<tr style="height:15px !important;" class="start">
						<td style="padding-right:15px;">
						<input type="checkbox" class="get_value" value="complete"></input>
						</td>
						
						<td style="min-width:60px;font-size:.7em;" class="notes">
						<p class="note-label">See Notes</p>
						</td>
						
						<td style="min-width:125px;"><?php 
						if (ISSET($project->completed)) {
							echo "<s>$project->project_name</s>"; 
						} else {
							echo $project->project_name;
						}
						?>
						</td>

						<td style="min-width:500px;">
						
						<?php 
							if (ISSET($project->completed)) {
								echo "<s>$project->task_name</s>"; 
							} else {
								echo $project->task_name;
							}
						?>
					
						</td>
						<!-- <td>
						
							 <?php 
						// if (ISSET($project->completed)) {
							// echo "<s>$project->task_description</s>"; 
						// } else {
							// echo $project->task_description;
						// }
						// ?>
					
						</td> -->
						<td>
						
							<?php echo $project->status; ?>
						
						</td>
						<td style="padding-left:20px;">
						{!! 
								Form::open(
									array(
										'method' => 'delete',
										'route' => [ 'wedding.destroy', $project->id]
											)
								) 
						!!}
							
								<button type="submit" style="height:15px;font-size:.4em;">X</button>
							{!! Form::close() !!}
						</td>
					</tr>
					<tr  style="display:none;" class="note">
					<td colspan="5" style="height:100px;background-color:#eaeaea;padding:25px;">
					<span style="font-weight:bold; display:block;padding-bottom:15px;">Notes</span>
					<span><?php echo $project->task_description; ?></span>
					</td>
					</tr>